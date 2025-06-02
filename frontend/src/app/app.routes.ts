import { Routes } from '@angular/router';
import { AppcontentComponent } from './appcontent/appcontent.component';
import { LeaderboardComponent } from './leaderboard/leaderboard.component';

export const routes: Routes = [
	{ path: 'content', component: AppcontentComponent },
	{ path: 'leaderboard', component: LeaderboardComponent }
];
