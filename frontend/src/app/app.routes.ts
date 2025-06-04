import { Routes } from '@angular/router';

import { AppcontentComponent } from './appcontent/appcontent.component';
import { LeaderboardComponent } from './leaderboard/leaderboard.component';

import { DashboardComponent as AdminDashboardComponent } from './admin/dashboard/dashboard.component';

export const routes: Routes = [
	{ path: 'content', component: AppcontentComponent },
	{ path: 'leaderboard', component: LeaderboardComponent },
	{ path: 'admin/dashboard', component: AdminDashboardComponent },
];
