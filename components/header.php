<!-- Header -->
<div class="flex bg-main-content h-16 text-center align-self items-center">
    <div class="flex-none w-40 font-bold" style="font-size: x-large" id="title">
        The Snake
    </div>
    <div class="grow">
        <a href="?page=play" id="play-button" class="rounded-md bg-button px-8 py-1">Play</a>
    </div>
    <div class="flex-none w-40" id="openMenu">
        <div id="burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<!-- Header's menu -->
<div id="sideMenu" class="menu h-screen w-80 float-right bg-third-content rounded-l-lg z-50"
    style="position: fixed; right: 0;">
    <div class="text-center">
        <div class="p-6 menuItem">
            <a href="?page=about">About Us</a>
        </div>
        <div class="p-6 menuItem">
            <a href="?page=learn">How to play</a>
        </div>
        <div class="p-6 menuItem">
            <a href="?page=help">Send Help</a>
        </div>

    </div>

</div>

<script>
    const slideOutAnimation = anime({
        targets: '.menu',
        // Properties 
        translateX: ['100%', 0],
        // Property Parameters
        duration: 750,
        easing: 'easeOutQuad',
        // Animation Parameters
        direction: ''
    });
    slideOutAnimation.reverse();

    const slideInAnimation = anime({
        targets: '.menu',
        // Properties 
        translateX: [0, '100%'],
        // Property Parameters
        duration: 300,
        easing: 'easeInQuad',
        // Animation Parameters
        direction: ''
    });
    slideInAnimation.reverse();

    anime({
        targets: '.menu',
        translateX: [0, '100%'],
        duration: 1,
    });

    let sideMenuState = "closed";

    $('#openMenu').click(toggleLaunchMenu);
    $('body').click((evt) => {
        if (evt.target.id != "openMenu" && $(evt.target).closest('#openMenu').length == 0
            && evt.target.id != "sideMenu" && $(evt.target).closest('#sideMenu').length == 0
            && sideMenuState == "open")
            closeMenu();
    });

    function toggleLaunchMenu() {
        if (sideMenuState == 'closed') {
            launchMenu();
        } else {
            closeMenu();
        }
    }

    function launchMenu() {
        /* Add typewriter effect */
        var items = document.getElementsByClassName('menuItem');
        for (var i = 0; i < items.length; i++) {
            items[i].classList.add("typewriter");
        }

        anime({
            targets: '.menu',
            opacity: 1,
            duration: 100,
        });

        slideInAnimation.pause();
        slideOutAnimation.restart();
        sideMenuState = 'open';
        $('#openMenu div').addClass("open");
    }

    function closeMenu() {
        $('#openMenu').css("opacity", "1");

        slideOutAnimation.pause();
        slideInAnimation.restart();

        sideMenuState = 'closed';
        $('#openMenu div').removeClass("open");
    }
</script>

<style>
    @media (max-width: 768px) {
        .menu {
            width: 100%;
        }

        .menuItem {
            height: 10em;
            padding: 2em;
        }
    }

    #title {
        animation: pulse 2s infinite;
}
</style>