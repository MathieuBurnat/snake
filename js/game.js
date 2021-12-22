const GRID_W = 20;
const GRID_H = 20;
const GRID_S = 30;

const UPDATE_FREQ = 10;

let lastUpdate = 0;

const background = new PIXI.Graphics();
const player = new PIXI.Graphics();
const fruit = new PIXI.Graphics();

let apple;
let gameState = "playing";

const style = getComputedStyle(document.body);
const colorNames = ['p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8', 'p9', 'apple'];
const colors = Object.assign( {}, ...colorNames.map(c => ({ [c]: Number("0x" + style.getPropertyValue(`--${c}`).substring(1)) })) );

const snake = {
    parts : [
        {x: 3, y: 3},
    ],
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

    fruit.clear();
    fruit.beginFill(colors.apple);
    fruit.drawCircle(x * GRID_S + GRID_S / 2, y * GRID_S + GRID_S / 2, GRID_S/2 - 2);
    fruit.endFill();
}

const beginGame = () => {
    snake.parts = [{x: 3, y: 3}];
    snake.direction = 'right';
    state = "playing";
    spawnApple();
}

const gameOver = () => {
    state = "gameover";
}

const app = new PIXI.Application({ 
    antialias: true, 
    transparent: true,
    width: 600,
    heigth: 600,
});
document.querySelector("#gameSection").appendChild(app.view);

// Draw grid
for(let x = 0; x < GRID_W; x++) {
    for(let y = 0; y < GRID_H; y++) {
        background.beginFill(colors.p2, 1);
        background.drawRect(x * GRID_S + 3, y * GRID_S + 3, GRID_S - 3, GRID_S - 3);
    }
}

app.ticker.add((delta) => {
    if(state != "playing")
        return;

    lastUpdate += delta;

    if(lastUpdate > UPDATE_FREQ) {
        lastUpdate = 0;
        snake.updatePosition();
    }

    // Draw player
    player.clear();
    for(let [key, part] of Object.entries(snake.parts)) {
        player.beginFill(colors.p7, 1);
        let partSize = key == 0 ? 0 : (key / snake.parts.length) * 9;
        player.drawCircle(part.x * GRID_S + GRID_S / 2, part.y * GRID_S + GRID_S / 2, GRID_S / 2 - partSize);
    }
});

document.addEventListener('keydown', (ev) => {
    const directions = {'ArrowRight': 'right', 'ArrowLeft': 'left', 'ArrowUp': 'up', 'ArrowDown': 'down'};

    if(ev.key in directions) 
        snake.setDirection(directions[ev.key]);

    if(state == "playing" && lastUpdate > UPDATE_FREQ*0.66) {
        snake.updatePosition();
        lastUpdate = 0;
    }
});

app.stage.addChild(background);
app.stage.addChild(player);
app.stage.addChild(fruit);

beginGame();