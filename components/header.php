<!-- Header -->
<div class="flex bg-main-content h-16 text-center align-self items-center">
    <div class="flex-none w-14">
        Snake
    </div>
    <div class="grow">
        <a href="play" class="rounded-md bg-button px-8 py-1">Play</a>
    </div>
    <div class="flex-none w-14">
        <svg xmlns="http://www.w3.org/2000/svg" id="openMenu" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd" />
        </svg>
    </div>
</div>

<!-- Header's menu -->
<div class="menu h-screen w-40 float-right bg-third-content">
    <div id="closeMenu" class="cross p-5">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </div>

    <div class="text-center">
        <div class="p-6">
            <a href="#about">About Us</a>
        </div>
        <div class="p-6">
            <a href="#learn">How to play</a>
        </div>
        <div class="p-6">
            <a href="#help">Send Help</a>
        </div>

    </div>
</div>

<script>
    $('#openMenu').click(function () { launchMenu(); });
    $('#closeMenu').click(function () { closeMenu(); });

    function launchMenu() {
        console.log("Open menu");

        let animation = anime({
            targets: '.menu',
            // Properties 
            translateX: 200,
            borderRadius: 50,
            // Property Parameters
            duration: 500,
            easing: 'linear',
            // Animation Parameters
            direction: 'reverse'
        });
    }

    function closeMenu() {
        console.log("close menu");
    }
</script>