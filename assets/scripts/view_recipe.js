function view_recipe(event, id) {
    // FIXME this is not very good. What if i decide to change this?
    if (event.target.closest("img")) {
        return;
    }
    location.assign("/view-recipe?id=" + id);
}