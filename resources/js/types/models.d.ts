export interface Book {
    id?: number;
    title: string;
    slug: string;
    publisher: string;
    published_at: number;
    version: number;
    max_index: number;
}

export interface Word {
    id?: number;
    english: string;
    part_of_speech: string;
}

export interface Line {
    id?: number;
    book: Book;
    word: Word;
    book_id: number;
    word_id: number;
    definition: string;
    index_no: number;
    usages?: Array;
}

export interface Usage {
    id?: number;
    line_id?: number;
    example: string;
    translation: string;
    ordered_words?: string;
}

export interface linkObj {
    active: boolean;
    label: string;
    url: string;
}

export interface FlashMessage {
    message?: string | null;
}
