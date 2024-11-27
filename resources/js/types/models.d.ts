export interface Book {
    id?: number;
    title: string;
    slug: string;
    publisher: string;
    published_at: number;
    version: number;
}

export interface Word {
    id?: number;
    english: string;
}

export interface Line {
    id?: number;
    book: Book;
    word: Word;
    book_id: number;
    word_id: number;
    definition: string;
    index_no: number;
}

export interface Usage {
    id?: number;
    line_id?: number;
    example: string;
}
