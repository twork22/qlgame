import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

@Component({
  selector: 'app-sidebar',
  standalone: true,
  imports: [CommonModule, RouterModule],
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent {
  menuItems = [
    {
      label: 'Home',
      icon: '/assets/sidebar/ic_home.png',
      route: '/'
    },
    {
      label: 'My VocabSpace',
      icon: '/assets/sidebar/ic_myvocab.png',
      route: '/myvocabspace'
    },
    {
      label: 'Leaderboard',
      icon: '/assets/sidebar/ic_leaderboard.png',
      route: '/leaderboard'
    },
    {
      label: 'Discover',
      icon: '/assets/sidebar/ic_discover.png',
      route: '/discover'
    }
  ];

  adminMenuItems = [
    {
      label: 'Dashboard',
      icon: '/assets/sidebar/ic_barchart.png',
      route: '/admin/dashboard',
    },
  ]
}
