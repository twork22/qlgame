import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-header',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './header.component.html',
  styleUrl: './header.component.css'
})
export class HeaderComponent {
  searchQuery: string = '';
  logoPath: string = 'assets/header/logo1.png'; // Gán cố định

  handleImageError(event: any) {
    console.error('Error loading image:', event);
    const imgElement = event.target as HTMLImageElement;
    imgElement.style.display = 'none';
    const parentDiv = imgElement.parentElement;
    if (parentDiv) {
      const icon = document.createElement('i');
      icon.className = 'bi bi-book-half logo-icon';
      parentDiv.insertBefore(icon, imgElement);
    }
  }

  onSearch(): void {
    if (this.searchQuery.trim()) {
      console.log('Searching for:', this.searchQuery);
    }
  }
}
