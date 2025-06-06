import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';

interface Vocabulary {
  vocab_id: number;
  word_set_id: number;
  term: string;
  definition: string;
}

interface WordSetDetailResponse {
  word_set_id: number;
  title: string;
  description: string;
  created_date: string;
  view_count: number;
  is_hidden: number;
  user_id?: number // optional
  vocabularies: Vocabulary[]
}

@Component({
  selector: 'app-word-set-detail-popup',
  imports: [CommonModule],
  templateUrl: './word-set-detail-popup.component.html',
  styleUrl: './word-set-detail-popup.component.css'
})
export class WordSetDetailPopupComponent {
  wordsetDetail: WordSetDetailResponse = {
    word_set_id: 0,
    title: '',
    description: '',
    created_date: '',
    view_count: 0,
    is_hidden: 0,
    vocabularies: [],
  };

  showPopup(data: WordSetDetailResponse) {
    this.wordsetDetail = data;
    // @ts-ignore
    $('#modalWordsetDetail').modal('show')
  }
}
