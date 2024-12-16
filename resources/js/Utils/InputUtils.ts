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
}

export function insertTextAtCursor(
    element: HTMLInputElement,
    text: string,
): void {
    insertAtCursor(element, text);
}
