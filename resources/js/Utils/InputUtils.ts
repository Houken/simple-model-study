export function insertAtCursor(element: HTMLInputElement, text: string): void {
    const cursorPosition = element.selectionStart || 0;
    const textBefore = element.value.substring(0, cursorPosition);
    const textAfter = element.value.substring(cursorPosition);

    element.value = textBefore + text + textAfter;
    element.focus();
    element.setSelectionRange(
        cursorPosition + text.length,
        cursorPosition + text.length,
    );
}

export function insertSpecialChar(elementId: string, char: string): void {
    const element = document.getElementById(elementId) as HTMLInputElement;
    insertAtCursor(element, char);
    // v-model doesn't update the value immediately
    element.dispatchEvent(new Event('input'));
}

export function insertTextAtCursor(
    element: HTMLInputElement,
    text: string,
): void {
    insertAtCursor(element, text);
}

export function encloseSentencesInQuotes(elementId: string, quote: string) {
    const element = document.getElementById(elementId) as HTMLInputElement;
    const selectionStart = element.selectionStart || 0;
    const selectionEnd = element.selectionEnd || 0;
    if (selectionStart < selectionEnd) {
        const textBefore = element.value.substring(0, selectionStart);
        const textSelected = element.value.substring(
            selectionStart,
            selectionEnd,
        );
        const textAfter = element.value.substring(selectionEnd);

        const quotedText =
            textBefore + quote + textSelected + quote + textAfter;

        element.value = quotedText;
        element.dispatchEvent(new Event('input'));

        element.focus();
        element.setSelectionRange(selectionEnd + 1, selectionEnd + 1);
    }
}
