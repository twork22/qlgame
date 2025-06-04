import { HttpClient } from '@angular/common/http';
import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';

interface ReportItem {
  title: string;
  status: number;
  reason: string;
  reported_date: string;
}

@Component({
  selector: 'app-dashboard',
  imports: [CommonModule],
  templateUrl: './dashboard.component.html',
  styleUrl: './dashboard.component.css'
})
export class DashboardComponent implements OnInit {
  reportList: ReportItem[] = [];

  constructor (private http: HttpClient) {
    // 
  }

  ngOnInit(): void {
    this.getReportList();
  }

  getReportList() {
    this.http.get('/api/admin/reported-list')
      // @ts-ignore
      .subscribe((data: ReportItem[]) => {
        console.log(data);
      });
  }
}
