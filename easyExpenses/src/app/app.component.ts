import { Component } from '@angular/core';
import { Platform } from '@ionic/angular';
import { SplashScreen } from '@ionic-native/splash-screen/ngx';
import { StatusBar } from '@ionic-native/status-bar/ngx';
import { CommonServiceService } from './services/common-service.service';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html'
})
export class AppComponent {
  public appPages = [
    {
      title: 'Resumen',
      url: '/home',
      icon: 'wallet'
    }
  ];

  constructor(
    private platform: Platform,
    private splashScreen: SplashScreen,
    private statusBar: StatusBar,
    private commonService : CommonServiceService
  ) {
    this.initializeApp();
  }

  initializeApp() {
    this.platform.ready().then(() => {
      this.addPages();
      this.statusBar.styleDefault();
      this.splashScreen.hide();
    });
  }


  addPages(){
    this.commonService.traer("/tarjeta-bancaria/").subscribe(
      data => {
        data.forEach(element => {
          this.appPages.push({title : element.marca + " " + element.entidad , url: '/credit-card/' + element.idTarjeta,icon : 'card'})
        });
      }
     );
  }




}
