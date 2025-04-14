let currentWordIndex = 0;
let currentCharIndex = 0;

document.addEventListener('DOMContentLoaded', () => {
    const text = document.getElementById('textarea');
    const caret = document.getElementById('caret');

    document.addEventListener('keydown', function(event) {
        const word = text.querySelectorAll('.word')[currentWordIndex];
        const letter = word.querySelectorAll('.letter')[currentCharIndex];
        let new_letter = null;
        const key = event.key;

        const expectedChar = originalText[currentWordIndex]?.[currentCharIndex];
        console.log(`Нажата: ${key}`);

        if (key === 'Backspace') {

            if (currentCharIndex === 0) {
                if (currentWordIndex === 0) {
                    return;
                }
                currentWordIndex--;
                currentCharIndex = originalText[currentWordIndex].length - 1;

                new_letter = text.querySelectorAll('.word')[
                    currentWordIndex].querySelectorAll('.letter')[currentCharIndex];
            }
            else {
                currentCharIndex--;

                new_letter = word.querySelectorAll('.letter')[currentCharIndex];
            }
            new_letter.classList.remove('correct', 'incorrect');
            new_letter.before(caret);
        }

        if (key.length === 1) { // игнорируем служебные клавиши
            console.log(`Ожидалась: ${expectedChar}`);

            if (key === expectedChar) {
                // Верно
                letter.classList.add('correct');
            } else {
                // Ошибка
                console.log('❌ Ошибка');
                letter.classList.add('incorrect');
            }
            currentCharIndex++;

            // Если слово закончено — переходим к следующему
            if (key === " ") {
                currentCharIndex = 0;
                currentWordIndex++;
                new_letter = text.querySelectorAll('.word')[currentWordIndex].querySelectorAll('.letter')[0];
            }
            else {
                if (currentCharIndex === originalText[currentWordIndex].length) {
                    letter.after(caret);
                    currentCharIndex--;
                    return;
                }
                new_letter = word.querySelectorAll('.letter')[currentCharIndex];
            }
            new_letter.before(caret);
        }
    });
});
