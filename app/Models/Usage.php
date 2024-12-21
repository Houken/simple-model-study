<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    /** @use HasFactory<\Database\Factories\UsageFactory> */
    use HasFactory;

    protected $guarded = [];

    public function line()
    {
        return $this->belongsTo(Line::class);
    }

    // 語順整序問題の生成をアクセサで記述
    protected $appends = ['ordered_words'];
    public function getOrderedWordsAttribute()
    {
        // 対象のインスタンスからexampleを取得
        $example = $this->example;
        // 生成に不要な文字、空白を取り除き、全体を小文字にする
        $trimmedExample = strtolower(trim(str_replace([',', '.', '?', '!', '`'], '', $example)));
        // アスタリスクで囲まれた部分とそうでない部分に分割
        preg_match_all('/\*.*?\*|[^*]+/', $trimmedExample, $matches);
        // アスタリスクを取り除き、マークをつけるコールバック関数
        $removeAsteriskAndAddFlag = function ($match) {
            $result = [
                'phrase' => trim(str_replace('*', '', $match)),
                'asterisked' => str_starts_with($match, '*'),
            ];
            return $result;
        };
        // マッチした部分をコールバック関数を使って変換
        $splitted = $matches ? array_map($removeAsteriskAndAddFlag, $matches[0]) : [];
        // dd($splitted);
        // フレーズを単語単位に分割し、asteriskedは先頭文字以外アンダースコアで置換する
        $question = [];
        foreach ($splitted as $value) {
            $words = explode(' ', $value['phrase']);
            if ($value['asterisked']) {
                foreach ($words as $word) {
                    $question[] = $word[0] . preg_replace('/\w/', ' _', substr($word, 1));
                }
            } else {
                $question = array_merge($question, $words);
            }
        }
        // 単語の順番をランダムに並び替え、スラッシュで繋ぐ
        shuffle($question);
        $formattedQuestion = implode(' / ', $question);

        return $formattedQuestion;
    }
}
