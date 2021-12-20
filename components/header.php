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

<script>
    $('#menu').click(function(){ launchMenu(); });

    function launchMenu(){
        console.log("Menu");
    }
</script>
