import { Component , ViewChild, ElementRef } from '@angular/core';
import { Chart } from 'chart.js';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
 
  @ViewChild('doughnutCanvas') doughnutCanvas : ElementRef;

  barChart: any;

  ngOnInit() {

    this.barChart = new Chart(this.doughnutCanvas.nativeElement , {

        type: 'doughnut',
        data: {
            labels: ["Visa Hipotecario", "Visa Macro", "MC Macro", "MC Patagonia", "Viaticos", "Otros"],
            datasets: [{
                label: '% dentro de gastos',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            // scales: {
            //     yAxes: [{
            //         ticks: {
            //             beginAtZero:true
            //         }
            //     }]
            // }
            layout: {
              padding: {
                  left: 0,
                  right: 0,
                  top: 0,
                  bottom: 0
              }
          }
        }

    });

  }

}
