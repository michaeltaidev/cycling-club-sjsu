import $ from 'jquery';

class Search {
    constructor() {
        // *run addSearchHTML() first*
        this.addSearchHTML();
        this.resultsDiv = $("#search-overlay__results");
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.searchField = $("#search-term");
        this.events();
        this.isOverlayOpen = false;
        this.isSpinnerVisible = false;
        this.previousValue;
        this.typingTimer;
    }

    events() {
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
        $(document).on("keydown", this.keyPress.bind(this));
        this.searchField.on("keyup", this.typingLogic.bind(this));
    }

    openOverlay() {
        this.searchOverlay.addClass("search-overlay--active");
        $("body").addClass("body-no-scroll");
        this.searchField.val('');
        setTimeout(() => this.searchField.focus(), 350);
        this.isOverlayOpen = true;
    }

    closeOverlay() {
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll");
        this.isOverlayOpen = false;
    }

    keyPress(e) {
        if (e.keyCode == 83 && !this.isOverlayOpen && !$("input, textarea").is(':focus')) this.openOverlay();
        if (e.keyCode == 27 && this.isOverlayOpen) this.closeOverlay();
    }

    typingLogic() {
        if (this.searchField.val() != this.previousValue) {

            clearTimeout(this.typingTimer);

            if (this.searchField.val()) {
                if (!this.isSpinnerVisible) {
                    this.resultsDiv.html('<div class="spinner-loader"></div>');
                    this.isSpinnerVisible = true;
                }
                this.typingTimer = setTimeout(this.getResults.bind(this), 300);
            } else {
                this.resultsDiv.html("");
                this.isSpinnerVisible = false;
            }
        }

        this.previousValue = this.searchField.val();
    }

    getResults() {
        $.getJSON(meetupData.root_url + '/wp-json/meetup/v1/search?term=' + this.searchField.val(), (results) => {
            this.resultsDiv.html(`
                <div class="row">
                    <div class="one-half">
                        <h2 class="search-overlay__section-title">Events</h2>
                        ${results.events.length ? '' : `<p>No results found. <a href="${meetupData.root_url}/events">Click here to view all events.</a></p>`}
                        ${results.events.map(item => `
                            <div class="event-summary">
                                <a class="event-summary__date t-center" href="${item.permalink}">
                                    <span class="event-summary__month">${item.month}</span>
                                    <span class="event-summary__day">${item.day}</span>
                                </a>
                                <div class="event-summary__content">
                                    <h5 class="event-summary__title headline headline--tiny"><a href="${item.permalink}">${item.title}</a></h5>
                                    <p>${item.description}<a href="${item.permalink}" class="nu gray"> Learn more</a></p>
                                </div>
                            </div>
                        `).join("")}
                    </div>
                    <div class="one-half">
                        <h2 class="search-overlay__section-title">${meetupData.news_name}</h2>
                        ${results.news.length ? '' : `<p>No results found. <a href="${meetupData.root_url}/blog">Click here to view all ${meetupData.news_name}.</a></p>`}
                        ${results.news.map(item => `
                            <div class="event-summary">
                                <a class="event-summary__date event-summary__date--beige t-center" href="${item.permalink}">
                                    <span class="event-summary__month">${item.month}</span>
                                    <span class="event-summary__day">${item.day}</span>
                                </a>
                                <div class="event-summary__content">
                                    <h5 class="event-summary__title headline headline--tiny"><a href="${item.permalink}">${item.title}</a></h5>
                                    <p>${item.description}<a href="${item.permalink}" class="nu gray"> Learn more</a></p>
                                </div>
                            </div>
                        `).join("")}
                    </div>
                </div>
            `);
        this.isSpinnerVisible = false;
        });
    }

    addSearchHTML() {
        $("body").append(`
            <div class="search-overlay">
                <div class="search-overlay__top">
                    <div class="container">
                        <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
                            <input type="text" class="search-term" placeholder="Search" id="search-term">
                        <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="container">
                    <div id="search-overlay__results"></div>
                </div>
            </div>
        `);
    }
}

export default Search;