export interface Book {
    id?: number;
    title: string;
}

export interface Word {
    id?: number;
    english: string;
}

export interface Line {
    id?: number;
    book_id: number;
    word_id: number;
    definition: string;
}

export interface Usage {
    id?: number;
    line_id?: number;
    example: string;
}
