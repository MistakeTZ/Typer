let currentWordIndex = 0;
let currentCharIndex = 0;
let timer = null;

function onTypingComplete(time, correct, incorrect) {
    document.getElementById('time').value = time;
    document.getElementById('correct').value = correct;
    document.getElementById('incorrect').value = incorrect;
    document.getElementById('resultForm').submit();
}

document.addEventListener('DOMContentLoaded', () => {
    const text = document.getElementById('textarea');
    const caret = document.getElementById('caret');  

    document.addEventListener('keydown', function(event) {
        const word = text.querySelectorAll('.word')[currentWordIndex];
        let new_letter = null;
        let after = false;
        const key = event.key;

        if (key === 'Backspace') {

            if (currentCharIndex === 0) {
                if (currentWordIndex === 0) {
                    return;
                }
                currentWordIndex--;
                currentCharIndex = originalText[currentWordIndex].length;

                new_letter = text.querySelectorAll('.word')[
                    currentWordIndex].querySelectorAll('.letter')[currentCharIndex - 1];
                after = true;
            }
            else {
                currentCharIndex--;

                new_letter = word.querySelectorAll('.letter')[currentCharIndex];
                new_letter.classList.remove('correct', 'incorrect');
            }
        }

        else if (key.length === 1) { // игнорируем служебные клавиши
            if (key === " ") {

                if (currentCharIndex !== originalText[currentWordIndex].length) {
                    word.querySelectorAll('.letter')[currentCharIndex].classList.add('incorrect');
                }

                currentCharIndex = 0;
                currentWordIndex++;
                new_letter = text.querySelectorAll('.word')[currentWordIndex].querySelectorAll('.letter')[0];
            }
            else {
                if (currentCharIndex === originalText[currentWordIndex].length) {
                    return;
                }

                const expectedChar = originalText[currentWordIndex]?.[currentCharIndex];
                const letter = word.querySelectorAll('.letter')[currentCharIndex];

                if (currentCharIndex === 0 && currentWordIndex === 0) {
                    timer = Date.now();
                }

                if (key === expectedChar) {
                    // Верно
                    letter.classList.add('correct');
                } else {
                    letter.classList.add('incorrect');
                }
                currentCharIndex++;

                if (currentCharIndex === originalText[currentWordIndex].length) {
                    if (currentWordIndex === originalText.length - 1) {
                        const time = (Date.now() - timer) / 1000;
                        const correct = text.querySelectorAll('.correct').length;
                        const incorrect = text.querySelectorAll('.incorrect').length;
                        onTypingComplete(time, correct, incorrect);
                        return;
                    }

                    after = true;
                    new_letter = word.querySelectorAll('.letter')[currentCharIndex - 1];
                }
                else {
                    new_letter = word.querySelectorAll('.letter')[currentCharIndex];
                }
            }
        }

        if (new_letter === null) return;

        if (after) {
            new_letter.after(caret);
        }
        else {
            new_letter.before(caret);
        }
    });
});
