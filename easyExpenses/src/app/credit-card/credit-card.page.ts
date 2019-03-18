import { Component, OnInit } from '@angular/core';
import { CommonServiceService } from '../services/common-service.service';
import { ResumenTcService } from '../services/resumen-tc.service';
import { ActivatedRoute, ParamMap } from '@angular/router';
import { switchMap } from 'rxjs/operators';

@Component({
  selector: 'app-credit-card',
  templateUrl: './credit-card.page.html',
  styleUrls: ['./credit-card.page.scss'],
})
export class CreditCardPage implements OnInit {

  aConsumos : any[];

  constructor(private commonServ : CommonServiceService, private resumenTCServ : ResumenTcService, private route : ActivatedRoute) { }

  ngOnInit() {  

    this.route.params.subscribe(
      params =>{
        this.resumenTCServ.traerResumen(params['idTarjeta']).subscribe(
          data => {
            this.aConsumos = data;
            console.log(data);
          }
        )
      }
    )
    
  }



  
}//CreditCardPage


