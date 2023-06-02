import $ from 'jquery';

class Search {
    // 1. describe and create/initiate our object
    constructor() {
        // this.addSearchHTML();

        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-close, .mobile-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.searchField = $("input[type=search]:visible");
        this.resultsDiv = $(".search-overlay__results");
        this.searchSubmit = $(".search-submit");

        this.searchSubmit.fadeOut()

        this.events();

        this.isOverlayOpen = false;
        this.isSpinnerVisible = false;

        this.previousValue;
        this.typingTimer;
    }

    // 2.events
    events() {
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));

        $(document).on("keydown", this.keyPressDispatcher.bind(this));

        this.searchField.on("keyup", this.typingLogic.bind(this));
    }


    // 3. methods (function, action...)

    typingLogic() {
        if (this.searchField.val()) {
            $(".mobile-overlay__close").removeClass('d-none');
        }
        if (this.searchField.val() != this.previousValue) {
            clearTimeout(this.typingTimer);
            if (this.searchField.val()) {
                if (!this.isSpinnerVisible) {
                    this.resultsDiv.html(`<div class="text-center mt-2"><div class="spinner-border align-baseline text-primary" role="status"></div></div>`);
                    this.isSpinnerVisible = true;

                }
                this.typingTimer = setTimeout(this.getResults.bind(this), 750);

            } else {
                this.resultsDiv.html('');
                this.isSpinnerVisible = false;
                this.searchSubmit.fadeOut()
            }
        }
        this.previousValue = this.searchField.val();
    }

    getResults() {
        $.getJSON(jsData.root_url + '/wp-json/search/v1/search?term=' + this.searchField.val(), (results) => {
            this.resultsDiv.html(`
                <div class="pt-3 container">
                        <h5  class="mb-2 fw-bold text-center">مقالات</h5>
                        ${results.post.length ? '<div class="row row-cols-1 row-cols-lg-4 row-cols-md-2">' : '<p class="p-2 m-0 border-top">هیچ مقاله ای یافت نشد</p>'}
                        ${results.post.map((item, index) =>
                `
                    <article class="px-4" title="${item.title}">
                        <a class="border border-1 px-2 py-3 rounded row align-items-center" href="${item.url}">
                            <div><img class="w-100 object-fit rounded" height="200" src="${item.img}" alt="${item.title}" /></div>
                            <div class="pt-2">
                                    <h6 class="fw-bold fs-5 text-primary">${item.title}</h6>
                                    <div class="small"><p>${item.content}</p></div>
                            </div>
                        </a>
                    </article>`
            ).join(' ')}
                        ${results.post.length ? '</div>' : ''}
                </div>
            `)
            this.isSpinnerVisible = false;
            this.searchSubmit.fadeIn()
        });
    }

    keyPressDispatcher(e) {
        if (e.keyCode == 83 && !this.isOverlayOpen && !$("input, textarea").is(':focus')) {
            this.openOverlay();
        }
        if (e.keyCode == 27 && this.isOverlayOpen) {
            this.closeOverlay();
        }
    }

    openOverlay() {
        this.searchOverlay.addClass("search-overlay--active");
        $("body").addClass("body-no-scroll");

        this.searchField.val('');

        setTimeout(() => this.searchField.focus(), 301);

        this.isOverlayOpen = true;
        return false;

    }

    closeOverlay() {
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll");
        this.resultsDiv.html('');
        $(".mobile-overlay__close").addClass('d-none');
        this.searchField.val('');
        this.isOverlayOpen = false;
    }


}

export default Search;
