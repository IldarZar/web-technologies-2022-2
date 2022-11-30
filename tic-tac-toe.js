import {TicTacToe} from "./components/TicTacToe.js";

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init)
} else {
    init()
}

function init() {    
    const moveEl = document.getElementById('move-value')

    const onMove = (isXTurn) => {
        moveEl.innerText = isXTurn ? 'X' : '0'
    }

    const game = TicTacToe.init(
        {
            el: document.getElementById('tic-tac-toe'),
            onMove,
        }
    )
    
    game.startGame()
    
    const restartBtn = document.getElementById('restart-btn')

    restartBtn.addEventListener('click', () => {
        game.restartGame()
    })
}