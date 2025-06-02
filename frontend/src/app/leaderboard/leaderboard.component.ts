import { HttpClient } from '@angular/common/http';
import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';

interface LeaderboardEntry {
  user_id: number;
  rank: number;
  avatar: string;
  username: string;
  level: number;
  wordset: number;
}

@Component({
  selector: 'app-leaderboard',
  imports: [CommonModule],
  templateUrl: './leaderboard.component.html',
  styleUrl: './leaderboard.component.css'
})
export class LeaderboardComponent implements OnInit {
  leaderboardEntries: LeaderboardEntry[] = [];

  // TODO: need to use id of current login user
  my_user_id = 12;

  constructor (private http: HttpClient) {
    // 
  }

  ngOnInit(): void {
    this.getLeaderboard();
  }

  getLeaderboard () {
    // TODO: get data from backend
    // data should be sorted by rank
    this.leaderboardEntries = [
      { user_id: 123, rank: 1, avatar: '123', username: 'Iman', level: 1, wordset: 123 },
      { user_id: 234, rank: 2, avatar: '123', username: 'Vatani', level: 1, wordset: 123 },
      { user_id: 456, rank: 3, avatar: '123', username: 'Jonathan', level: 1, wordset: 123 },
      { user_id: 87, rank: 4, avatar: '123', username: 'test', level: 1, wordset: 123 },
      { user_id: 65, rank: 5, avatar: '123', username: 'test', level: 1, wordset: 123 },
      { user_id: 12, rank: 6, avatar: '123', username: 'test', level: 1, wordset: 123 },
    ]
    // this.http.get('/api/test', { responseType: 'text' })
    //   // @ts-ignore
    //   .subscribe((data) => {
    //     console.log(data)
    //   })
  }
}
