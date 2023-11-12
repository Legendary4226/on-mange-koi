import $ from 'jquery'

/**
 * Required data attributes :
 * url: the AJAX URL
 *
 * Data attributes :
 * method: default GET
 * type: default JSON, check JQuery documentation
 * dom-insert-target: Provide a selector used to target where the HTML in the response will be inserted.
 * callback-window: A global function executed with the content of the response.
 */

$(function () {
    $('.cta-ajax-click').click(ajax)
    $('.cta-ajax-change').change(ajax)
})

function ajax(event)
{
    const targetDatas = event.target.dataset

    const domInsertTarget = Boolean(targetDatas.domInsertTarget)

    $.ajax(targetDatas.url, {
        method: targetDatas.method ?? 'GET',
        dataType: targetDatas.dataType ?? 'json',
    })
        .done(function (response) {
            if (targetDatas.callbackWindow) {
                window[targetDatas.callbackWindow](response)
            }

            if (response.redirect) {
                window.location.href = response.redirect
            }

            if (domInsertTarget && response.html) {
                $(targetDatas.domInsertTarget).empty().append(response.html)
            }
        })
        .fail(function () {

        })
        .always(function () {

        })
}
