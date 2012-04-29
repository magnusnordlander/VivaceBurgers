<?php

namespace VivaceBurgers\AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use VivaceBurgers\AppBundle\Entity\Hamburger;

class LoadHamburgerData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $vivaceBurger = new Hamburger("Vivace Burger", 5.5,
<<<EOF
The most classic of our burgers. We begin with our locally baked sesame bun, lightly
toasted with salt and pepper. Next comes a six ounce 100% organic locally
farmed prime beef patty, cooked to perfection over our mesquite charcoal grill.

We then top our Vivace Burger with locally farmed heritage lettuce, our locally
grown house kosher dill pickles, and our special house Vivace sauce.

A livid symphony for your tastebuds!
EOF
        );

        $californication = new Hamburger("Californication", 7.5,
<<<EOF
The Californication burger combines the our PDX sensibilities with that
unique California flavor profile. We begin with a toasted whole wheat
bun from our neighbor artisan bakery. Next comes a six ounce 100% organic locally
farmed prime beef patty, cooked to perfection over our mesquite charcoal grill.

We then top our Californication Burger with the beautiful organic apple smoked bacon
from nearby Messer Farms, fresh California Haas and Fuerte avocado, locally farmed
heritage lettuce, and our California dressing.
EOF
        );

        $veganBaconCheeseburger = new Hamburger("Vegan Bacon Cheeseburger", 7.5,
<<<EOF
At Vivace Burgers we don't want any kind of half measures for our vegan customers.
That's why we created our Vegan Bacon Cheeseburger, to make sure that you don't
need to eat meat to get a great burger here.

We begin with our locally baked sesame bun, lightly toasted in olive oil with salt
and pepper. Next comes a 6 ounce chickpea and soy based vegan patty, which we've grilled
to perfection over a separate charcoal grill.

We then top the Vegan Bacon Cheeseburger with soy cheese of the very highest quality,
our tempeh based house vegan bacon, locally farmed heritage lettuce and tomatoes, and our
special vegan dressing.
EOF
        );

        $manager->persist($vivaceBurger);
        $manager->persist($californication);
        $manager->persist($veganBaconCheeseburger);
        $manager->flush();
    }
}