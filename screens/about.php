<div class="">
  <div class="flex flex-wrap w-auto">
    <h1>About Us's section</h1>
    <div class="text-aright">
      <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo sapiente error similique officiis suscipit cumque
        ab, veritatis alias, placeat commodi dicta maxime nulla quia! Placeat ipsa ut doloremque saepe numquam. Lorem
        ipsum dolor sit, amet consectetur adipisicing elit. Illum maiores numquam odio harum maxime deserunt error
        provident nisi eum omnis, unde inventore at quas quaerat rerum ipsa totam repudiandae nihil.</p>
    </div>
  </div>

  <div class="flex flex-wrap space-around" id="cards">
    <div class="flex-auto">
      <div class="flex-wrap">
        <div class="flip-card m-auto">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              <img
                src="https://www.thesprucepets.com/thmb/_yrib2KGkS4VJSgCQEl59KPUPOU=/1885x1414/smart/filters:no_upscale()/GettyImages-135630198-5ba7d225c9e77c0050cff91b.jpg"
                alt="Racoon" style="height: 300px;">
              <div class=" py-4 px-4 bg-white">
                <h3 class="text-lg font-semibold text-gray-600"> Dimitri </h3>
                <p class="mt-4 text-lg font-thin">Développeur full stack, joueur de guitare</p>
              </div>
            </div>
            <div class="flip-card-back">
              <h1>Dimitri I</h1>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui ea officiis natus excepturi quae! Iure
                dicta dolor sint nemo? Quod neque aperiam id officia. Amet, in! Eveniet debitis dolor nisi.</p>
              <p>We love that guy</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="flex-auto">
      <div class="flip-card m-auto">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="https://pbs.twimg.com/profile_images/697135903135797248/UcOjql3O_400x400.jpg"
              alt="Sneaky Snake" style="height: 300px;">
            <div class="py-4 px-4 bg-white">
              <h3 class="text-lg font-semibold text-gray-600">Mathieu</h3>
              <p class="mt-4 text-lg font-thin">Développeur endurcit et passionné de serpent</p>
            </div>
          </div>
          <div class="flip-card-back">
            <h1>Mathieu B</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, dolor asperiores voluptate
              doloremque a dignissimos quos, aut expedita accusantium impedit ducimus tempora! Fuga modi architecto
              eligendi. Nostrum, debitis cum! A.</p>
            <p>Architect & Engineer</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<style>
  #cards{
    animation: fadeInUp;
    animation-duration: 2s;
  }

  /* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
  .flip-card {
    background-color: transparent;
    height: 360px !important;
    width: 300px;
    border: 1px solid #f1f1f1;
    perspective: 1000px;
    /* Remove this if you don't want the 3D effect */
  }

  /* This container is needed to position the front and back side */
  .flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.8s;
    transform-style: preserve-3d;
  }

  /* Do an horizontal flip when you move the mouse over the flip box container */
  .flip-card:hover .flip-card-inner {
    transform: rotateY(180deg);
  }

  /* Position the front and back side */
  .flip-card-front,
  .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    -webkit-backface-visibility: hidden;
    /* Safari */
    backface-visibility: hidden;
  }

  /* Style the back side */
  .flip-card-back {
    background-color: var(--p4);
    color: white;
    transform: rotateY(180deg);
  }
</style>