import { TestBed } from '@angular/core/testing';

import { TaskLoaderService } from './task-loader.service';

describe('TaskLoaderService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: TaskLoaderService = TestBed.get(TaskLoaderService);
    expect(service).toBeTruthy();
  });
});
