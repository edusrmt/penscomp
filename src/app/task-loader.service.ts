import { Injectable } from '@angular/core';
import { Task } from './task'
import { InputTask } from './input'
import { ChoiceTask } from './choice'
import TasksJSON from '../assets/tasks/tasks.json'

const jsonToTask = (task: Task) => {
    if (task.type == 'input') return new InputTask(task)
    if (task.type == 'choice') return new ChoiceTask(task)
}

const tasksData = TasksJSON.map(jsonToTask)

@Injectable({ providedIn: 'root' })
export class TaskLoaderService {

  constructor() { }

  getTask (id : number) {
    return tasksData[id]
  }
}
