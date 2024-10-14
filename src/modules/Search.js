import $ from 'jquery';

class Search {
    // area 1. describe & create/init the object 
    constructor() {
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.events();
    }

    // area 2. events - on click and such
    events() {
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
    }

    // area 3. methods (function, action....)
    openOverlay() {
        this.searchOverlay.addClass("search-overlay--active"); // fixed typo
    }

    closeOverlay() {
        this.searchOverlay.removeClass("search-overlay--active"); // fixed typo
    }
}

export default Search;



