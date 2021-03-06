<div class="flex bottom-0 fixed h-16 bg-secondary-content w-full text-center items-center">
    <div class="flex-none w-40">
        <span class="text-xs italic">Release-1.</span><span class="versionNumber text-xs italic">1</span>
    </div>
    <div class="grow">
        <p class="text-sm">Made with ❤️</p>
    </div>
    <div class="flex-none w-40" id="flame">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <a href="https://github.com/MathieuBurnat/snake" target="_blank">
                <path fill-rule="evenodd"
                    d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
                    clip-rule="evenodd" />
        </svg>
    </div>
</div>

<style>
    #flame {
        animation: bounce 2s;
        animation-delay: 5s;
        animation-iteration-count: 3;
    }
</style>

<script>
    // Get the versionNumber
    var objPropLogEl = document.querySelector('.versionNumber');

    // create our object
    var myObject = {
        number: 0
    }

    // increase our object by 26 and update it
    anime({
        targets: myObject,
        number: 26,
        easing: 'linear',
        round: 1,
        duration: 2000,

        update: function () {
            objPropLogEl.innerHTML = JSON.stringify(myObject.number);
        }
    });
</script>