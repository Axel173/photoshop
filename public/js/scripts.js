$(document).ready(function () {
    $(document).on('click', 'a.ajax', function (e) {
        //console.log(this);
        e.preventDefault();
        var href = $(this).attr('href');

        // Getting Content
        getContent(href, true);
    });

    // Adding popstate event listener to handle browser back button
    window.addEventListener("popstate", function (e) {
        console.log(e);
        // Update Content
        getContent(location.href, false);
        document.title = history.state.title;
    });

    function getContent(url, addEntry) {
        $.ajax({
            url: url,
            type: 'GET',
            async: true,
            cache: false,
            //dataType: 'json',
            success: function (res) {
                console.log(res, $('.stock_box'));
                $('.stock_box').html(res);
                if (addEntry == true) {

                    var stateData = {
                        "location": url,
                    };
                    // Add History Entry using pushState
                    history.pushState(stateData, '', url);
                }
            }
        });
    }
});