import { HttpClient } from '@angular/common/http';
import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';

interface LeaderboardEntry {
  user_id: number;
  rank: number;
  fullname: string;
  wordsets_count: number;
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
    this.http.get('/api/leaderboard', { responseType: 'json' })
      // @ts-ignore
      .subscribe((data: LeaderboardEntry[]) => {
        this.leaderboardEntries = data;
      })
  }
}
