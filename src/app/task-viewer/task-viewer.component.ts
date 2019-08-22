import { Component, OnInit } from '@angular/core'
import { Task } from '../task'
import { TaskLoaderService } from '../task-loader.service';


@Component({
  selector: 'app-task-viewer',
  templateUrl: './task-viewer.component.html',
  styleUrls: ['./task-viewer.component.css']
})

export class TaskViewerComponent implements OnInit {
    curID = 0
    task : Task
    loader : TaskLoaderService
    
    constructor(private service : TaskLoaderService) {
        this.loader = service       
        this.task = this.loader.getTask(this.curID) 
    }

    nextTask () {
        this.curID++
        this.task = this.loader.getTask(this.curID)
    }

  ngOnInit() {
    
  }    
}
