import { HttpClient } from '@angular/common/http';
import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';

// in case of more than 2 status, then this should be more sane
const STATUS_ENUM = {
  0: 'inactive',
  1: 'active',
} as const;

interface UserEntry {
  avatar: string;
  username: string;
  name: string;
  email: string;
  status: keyof typeof STATUS_ENUM;
}

@Component({
  selector: 'app-users',
  imports: [CommonModule],
  templateUrl: './users.component.html',
  styleUrl: './users.component.css'
})
export class UsersComponent implements OnInit {
  statusEnum = STATUS_ENUM;

  userEntries: UserEntry[] = [];

  constructor (private http: HttpClient) {
    // 
  }
  
  ngOnInit(): void {
    this.getUsers();
  }

  getUsers () {
    // TODO: update users list using api
    this.userEntries = [
      { avatar: '123', username: 'test', name: '???1!', email: 'doan+xem@gmail.com', status: 1 },
      { avatar: '123', username: 'test', name: '???1!', email: 'doan+xem@gmail.com', status: 1 },
      { avatar: '123', username: 'test', name: '???1!', email: 'doan+xem@gmail.com', status: 0 },
    ]
    // this.http.get('/api/admin/users')
    //   .subscribe((data) => {
    //     console.log(data);
    //   });
  }
}
