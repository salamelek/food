FOOD SITE


What's this?
    I want a site where I can add my favorite foods and their recipes.

Functionalities:
    1) Have accounts for recipes
    2) Add recipes to your account
    3) Add tags to recipes
    4) Make a shopping list to prepare the selected meal(s)
    5) Search for a meal to eat based on tags and filters

Blueprint:
    User:
        - username
        - password

    Recipe:
        - ingredients               (pasta, salt, tomatoes, ...)
        - preparation instructions  (boil water, add...)
        - tags                      (meat, sweet, snack, ...)

    Ingredient:
        - cost / unit               (€/Kg, €/l)
        - measuring unit            (l, Kg)