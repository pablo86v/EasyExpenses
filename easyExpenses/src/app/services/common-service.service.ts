import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable, of } from 'rxjs';
import { catchError, map, tap } from 'rxjs/operators';
import { environment } from '../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class CommonServiceService {

  private headers: HttpHeaders;
  private apiURL= environment.apiURL ;

  constructor(private http : HttpClient) {
    this.headers = new HttpHeaders();
    this.headers.append('Content-Type', 'application/json');
   }

   traer(apiName) : Observable<Array<any>> {
    return this.http.get<Array<any>>(this.apiURL + apiName + 'traer')
    .pipe(
      tap(data => this.log(apiName+"::traer()")),
      catchError(this.handleError('traer()', []))
    );
   }






    // **************** Manejo de errores *************

   private handleError<T> (operation = 'operation', result?: T) {
    return (error: any): Observable<T> => {
 
      // TODO: send the error to remote logging infrastructure
      console.error(error); // log to console instead
 
      // TODO: better job of transforming error for user consumption
      this.log(`${operation} failed: ${error.message}`);
 
      // Let the app keep running by returning an empty result.
      return of(result as T);
    };
  }
 
   private log(message: string) {
    console.log(message);
  }











}
