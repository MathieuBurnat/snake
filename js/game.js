const GRID_W = 15;
const GRID_H = 15;
const GRID_S = 40;

const UPDATE_FREQ = 10;

let lastUpdate = 0;

let app;

const background = new PIXI.Graphics();
const player = new PIXI.Graphics();
const fruit = new PIXI.Graphics();
const fruitSprite = new PIXI.Sprite(PIXI.Texture.from('assets/apple.png'));
const snakeHead = new PIXI.Sprite(PIXI.Texture.from('assets/snake-head.png'));

const messageLabel = new PIXI.Text("");

let apple;
let gameState = "waitForStart";

const style = getComputedStyle(document.body);
const colorNames = ['p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8', 'p9', 'apple', 'button', 'snakebody'];
let colors = {};

const playButton = document.getElementById("play-button");
const timerSpan = document.getElementById("stats-timer");
const applesSpan = document.getElementById("stats-apples");

const touchButtonLeft = new PIXI.Graphics();
const touchButtonRight = new PIXI.Graphics();
const touchButtonUp = new PIXI.Graphics();
const touchButtonDown = new PIXI.Graphics();

let stats = {
    score: 0,
    applesEaten: 0,
    timer: 0,
}

const snake = {
    parts : [],
    direction: 'right',
    setDirection: (dir) => {
        if(dir == 'left' && snake.direction != 'right') 
            snake.direction = 'left';
        else if(dir == 'right' && snake.direction != 'left')
            snake.direction = 'right';
        else if(dir == 'up' && snake.direction != 'down')
            snake.direction = 'up';
        else if(dir == 'down' && snake.direction != 'up')
            snake.direction = 'down';
    },
    updatePosition: () => {
        if(gameState != "playing" || snake.parts.length == 0)
            return;

        let newHead = {x: snake.parts[0].x, y: snake.parts[0].y};

        // Update snake position
        if(snake.direction == 'right')
            newHead.x += 1;
        else if(snake.direction == 'left')
            newHead.x -= 1;
        else if(snake.direction == 'up')
            newHead.y -= 1;
        else if(snake.direction == 'down')
            newHead.y += 1;

        // Wrap the snake around the screen
        if(newHead.x < 0)
            newHead.x = GRID_W - 1;
        else if(newHead.x > GRID_W - 1)
            newHead.x = 0;
        if(newHead.y < 0)
            newHead.y = GRID_H - 1;
        else if(newHead.y > GRID_H - 1)
            newHead.y = 0;

        // Move the snake head to the new position
        snake.parts.unshift(newHead);

        // Detect collision with apple
        if(newHead.x == apple.x && newHead.y == apple.y) { 
            // Snake ate the apple, spawn new apple and don't remove tail
            spawnApple();
            stats.applesEaten += 1;
        }
        else {
            // Remove tail because snake didn't grow
            snake.parts.pop();  
        }

        // Detect collision with self
        const head = snake.parts[0];
        if(snake.parts.slice(1).find(p => p.x == head.x && p.y == head.y)) {
            gameOver();
        }
    }
}

const spawnApple = () => {
    const isPointInSnake = (point) => !snake.parts.find(p => p.x == point.x && p.y == point.y);

    let x, y;
    do {
        x = Math.floor(Math.random() * GRID_W);
        y = Math.floor(Math.random() * GRID_H);
        apple = {x, y};
    } while(!isPointInSnake(apple));

    fruitSprite.x = x * GRID_S;
    fruitSprite.y = y * GRID_S;
}

const beginGame = () => {
    snake.parts = [{x: 3, y: 5}, {x: 2, y: 5}, {x: 1, y: 5}];
    snake.direction = 'right';
    gameState = "gameStartFreeze";
    stats = {
        score: 0,
        applesEaten: 0,
        timer: 0,
    };
    hideMessage();
    spawnApple();
    setInterval(() => {
        if(gameState == "gameStartFreeze") gameState = "playing";
    }, 1333);
}

const gameOver = () => {
    gameState = "gameover";
    playButton.innerHTML = "Retry";
    displayMessage("                 Game Over!\nPress the 'Retry' button to try again");
}

const displayMessage = (message) => { 
    messageLabel.text = message;
    messageLabel.visible = true;
    messageLabel.y = (600 - messageLabel.height) / 2;
    messageLabel.x = (600 - messageLabel.width) / 2;
}

const hideMessage = () => { 
    messageLabel.visible = false;
    messageLabel.text = "";
}

const resizeCanvas = (size) => {
    app.renderer.resize(size, size);
    app.stage.scale.set(size/600, size/600);
} 

const hideTouchButtons = () => {
    touchButtonLeft.visible = false;
    touchButtonRight.visible = false;
    touchButtonUp.visible = false;
    touchButtonDown.visible = false;
}

const showTouchButtons = () => {
    touchButtonLeft.visible = true;
    touchButtonRight.visible = true;
    touchButtonUp.visible = true;
    touchButtonDown.visible = true;
}

const init = () => {
    app = new PIXI.Application({ 
        antialias: true, 
        transparent: true,
        width: 600,
        heigth: 600,
    });
    document.querySelector("#gameSection").appendChild(app.view);

    playButton.setAttribute("href", "#");

    colors = Object.assign( {}, ...colorNames.map(c => ({ [c]: Number("0x" + style.getPropertyValue(`--${c}`).trim().substring(1)) })) );

    snakeHead.anchor.set(0.5, 0.5);
    snakeHead.scale.set(GRID_S/500*1.3);
    snakeHead.x = -100;
    snakeHead.y = -100;

    fruitSprite.height = GRID_S;
    fruitSprite.width = GRID_S;
    fruitSprite.x = -100;
    fruitSprite.y = -100;

    // Draw grid
    for(let x = 0; x < GRID_W; x++) {
        for(let y = 0; y < GRID_H; y++) {
            background.beginFill(colors.p2, 1);
            background.drawRect(x * GRID_S + 3, y * GRID_S + 3, GRID_S - 3, GRID_S - 3);
        }
    }


    // Draw touch buttons
    const TOUCH_BUTTON_R = GRID_S * 1.66;

    touchButtonLeft.beginFill(colors.button, 1);
    touchButtonLeft.drawCircle(600 - 3*TOUCH_BUTTON_R + TOUCH_BUTTON_R/3, 600 - 2*TOUCH_BUTTON_R + TOUCH_BUTTON_R/3, TOUCH_BUTTON_R/2, TOUCH_BUTTON_R/2);
    touchButtonLeft.endFill();
    touchButtonLeft.alpha = 0.5;

    touchButtonRight.beginFill(colors.button, 1);
    touchButtonRight.drawCircle(600 - TOUCH_BUTTON_R + TOUCH_BUTTON_R/3, 600 - 2*TOUCH_BUTTON_R + TOUCH_BUTTON_R/3, TOUCH_BUTTON_R/2, TOUCH_BUTTON_R/2);
    touchButtonRight.endFill();
    touchButtonRight.alpha = 0.5;

    touchButtonUp.beginFill(colors.button, 1);
    touchButtonUp.drawCircle(600 - 2*TOUCH_BUTTON_R + TOUCH_BUTTON_R/3, 600 - 3*TOUCH_BUTTON_R + TOUCH_BUTTON_R/3, TOUCH_BUTTON_R/2, TOUCH_BUTTON_R/2);
    touchButtonUp.endFill();
    touchButtonUp.alpha = 0.5;

    touchButtonDown.beginFill(colors.button, 1);
    touchButtonDown.drawCircle(600 - 2*TOUCH_BUTTON_R + TOUCH_BUTTON_R/3, 600 - TOUCH_BUTTON_R + TOUCH_BUTTON_R/3, TOUCH_BUTTON_R/2, TOUCH_BUTTON_R/2);
    touchButtonDown.endFill();
    touchButtonDown.alpha = 0.5;


    // Draw loop
    app.ticker.add((delta) => {
        // Draw player
        player.clear();
        for(let [key, part] of Object.entries(snake.parts)) {
            if(key == 0) { 
                const directions = ["down", "left", "up", "right"];
                snakeHead.x = part.x * GRID_S + GRID_S/2;
                snakeHead.y = part.y * GRID_S + GRID_S/2;
                snakeHead.rotation = Math.PI/2 * directions.findIndex(x => x === snake.direction);
            }
            else {
                player.beginFill(colors.snakebody, 1);
                let partSize = key == 0 ? 0 : (key / snake.parts.length) * 9;
                player.drawCircle(part.x * GRID_S + GRID_S / 2, part.y * GRID_S + GRID_S / 2, GRID_S / 2 - partSize);
            }
        }
    });

    // Update loop
    app.ticker.add((delta) => {
        if(gameState != "playing")
            return;

        lastUpdate += delta;
        stats.timer += app.ticker.elapsedMS;

        if(lastUpdate > UPDATE_FREQ) {
            lastUpdate = 0;
            snake.updatePosition();
        }

        // Update stats display
        timerSpan.innerHTML = Math.floor((stats.timer/1000)/60) + ":" + String(Math.floor((stats.timer/1000)%60)).padStart(2, '0');
        applesSpan.innerHTML = stats.applesEaten;
    });

    document.addEventListener('keydown', (ev) => {
        const directions = {'ArrowRight': 'right', 'ArrowLeft': 'left', 'ArrowUp': 'up', 'ArrowDown': 'down'};

        if(gameState == "playing") {
            if(ev.key in directions) 
                snake.setDirection(directions[ev.key]);

            if(lastUpdate > UPDATE_FREQ*0.66) {
                snake.updatePosition();
                lastUpdate = 0;
            }
        }
        else if(gameState == "gameStartFreeze") {
            gameState = "playing";
        }
    });

    playButton.addEventListener('click', () => { 
        beginGame();
        playButton.innerHTML = "Restart";
    });

    touchButtonLeft.interactive = true;
    touchButtonLeft.on('pointerdown', () => snake.setDirection('left'));

    touchButtonRight.interactive = true;
    touchButtonRight.on('pointerdown', () => snake.setDirection('right'));
    
    touchButtonUp.interactive = true;
    touchButtonUp.on('pointerdown', () => snake.setDirection('up'));

    touchButtonDown.interactive = true;
    touchButtonDown.on('pointerdown', () => snake.setDirection('down'));

    app.stage.addChild(background);
    player.addChild(snakeHead);
    app.stage.addChild(player);
    fruit.addChild(fruitSprite);
    app.stage.addChild(fruit);
    app.stage.addChild(messageLabel);

    app.stage.addChild(touchButtonUp);
    app.stage.addChild(touchButtonDown);
    app.stage.addChild(touchButtonLeft);
    app.stage.addChild(touchButtonRight);

    displayMessage("Press the 'Play' button to begin");
}

document.addEventListener('DOMContentLoaded', init);