import { HttpClient } from '@angular/common/http';
import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';

interface ReportItem {
  word_set_id: number;
  report_id: number;
  wordset_title: string;
  report_status: number;
  reason: string;
  reported_date: string;
}
interface UpdateTicketResponse {
  success: boolean;
}
interface DashboardMetricsResponse {
  new_player: number;
  avg_play_time: number;
  pending_reports: number;
  total_wordset: number;
  wordset_created_today: number;
}

@Component({
  selector: 'app-dashboard',
  imports: [CommonModule],
  templateUrl: './dashboard.component.html',
  styleUrl: './dashboard.component.css'
})
export class DashboardComponent implements OnInit {
  reportList: ReportItem[] = [];

  metrics: DashboardMetricsResponse = {
    new_player: 0,
    avg_play_time: 0,
    pending_reports: 0,
    total_wordset: 0,
    wordset_created_today: 0,
  };

  get formattedTimeAvgPlaytime(): string {
    const hours = Math.floor(this.metrics.avg_play_time / 3600);
    const minutes = Math.floor((this.metrics.avg_play_time % 3600) / 60);
    const seconds = this.metrics.avg_play_time % 60;

    const parts = [];
    if (hours) parts.push(`${hours}h`);
    if (minutes) parts.push(`${minutes}m`);
    if (seconds || parts.length === 0) parts.push(`${seconds}s`);

    return parts.join(' ');
  }

  constructor (private http: HttpClient) {
    // 
  }

  ngOnInit(): void {
    this.getDashboardMetrics();
    this.getReportList();
  }

  getReportList() {
    this.http.get('/api/admin/reported-list')
      // @ts-ignore
      .subscribe((data: ReportItem[]) => {
        this.reportList = data;
      });
  }
  
  getDashboardMetrics() {
    this.http.get('/api/admin/metrics')
      // @ts-ignore
      .subscribe((data: DashboardMetricsResponse) => {
        this.metrics = data;
      })
  }

  updateTicket(index: number, status: number) {
    const ticketId = this.reportList[index].report_id;
    this.http.put(`/api/admin/reported-list/${ticketId}`, { report_status: status })
      // @ts-ignore
      .subscribe((data: UpdateTicketResponse) => {
        if (data.success) {
          this.reportList[index].report_status = status;
        }
      });
  }
}
