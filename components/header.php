<!-- Header -->
<div class="flex bg-main-content h-16 text-center align-self items-center">
    <div class="flex-none w-14">
        Snake
    </div>
    <div class="grow">
        <a href="play" class="rounded-md bg-button px-8 py-1">Play</a>
    </div>
    <div class="flex-none w-14">
        <svg xmlns="http://www.w3.org/2000/svg" id="menu" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd" />
        </svg>
    </div>
</div>

<!-- Header's menu -->
<div class="menu h-screen w-40 float-right bg-indigo-200">
    <div class="cross">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </div>

    <div class="items">
        <div class="item">
            About Us
        </div>
        <div class="item">
            How to play ? :c </div>
        <div class="item">
            
        </div>

    </div>
</div>

<script>
    $('#menu').click(function () { launchMenu(); });

    function launchMenu() {
        console.log("Menu");
    }
</script>