import { Routes } from '@angular/router';

import { AppcontentComponent } from './appcontent/appcontent.component';
import { LeaderboardComponent } from './leaderboard/leaderboard.component';

import { UsersComponent as AdminUsersListComponent } from './admin/users/users.component';

export const routes: Routes = [
	{ path: 'content', component: AppcontentComponent },
	{ path: 'leaderboard', component: LeaderboardComponent },
	{ path: 'admin/users', component: AdminUsersListComponent },
];
