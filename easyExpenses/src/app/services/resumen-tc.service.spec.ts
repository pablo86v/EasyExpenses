import { TestBed } from '@angular/core/testing';

import { ResumenTcService } from './resumen-tc.service';

describe('ResumenTcService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ResumenTcService = TestBed.get(ResumenTcService);
    expect(service).toBeTruthy();
  });
});
