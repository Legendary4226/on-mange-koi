<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use App\Trait\EntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: RecipeRepository::class)]
class Recipe
{
    use EntityTrait;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'recipe', targetEntity: GroceryListItem::class)]
    private Collection $groceryListItems;

    #[ORM\OneToMany(mappedBy: 'recipe', targetEntity: RecipeItem::class, orphanRemoval: true)]
    private Collection $recipeItems;

    public function __construct()
    {
        $this->groceryListItems = new ArrayCollection();
        $this->recipeItems = new ArrayCollection();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Collection<int, GroceryListItem>
     */
    public function getGroceryListItems(): Collection
    {
        return $this->groceryListItems;
    }

    public function addGroceryListItem(GroceryListItem $groceryListItem): static
    {
        if (!$this->groceryListItems->contains($groceryListItem)) {
            $this->groceryListItems->add($groceryListItem);
            $groceryListItem->setRecipe($this);
        }
        return $this;
    }

    public function removeGroceryListItem(GroceryListItem $groceryListItem): static
    {
        if ($this->groceryListItems->removeElement($groceryListItem)) {
            if ($groceryListItem->getRecipe() === $this) {
                $groceryListItem->setRecipe(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, RecipeItem>
     */
    public function getRecipeItems(): Collection
    {
        return $this->recipeItems;
    }

    public function addRecipeItem(RecipeItem $recipeItem): static
    {
        if (!$this->recipeItems->contains($recipeItem)) {
            $this->recipeItems->add($recipeItem);
            $recipeItem->setRecipe($this);
        }
        return $this;
    }

    public function removeRecipeItem(RecipeItem $recipeItem): static
    {
        if ($this->recipeItems->removeElement($recipeItem)) {
            if ($recipeItem->getRecipe() === $this) {
                $recipeItem->setRecipe(null);
            }
        }
        return $this;
    }
}
