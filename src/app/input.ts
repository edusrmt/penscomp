import { Task } from './task'

export class InputTask extends Task {
    constructor (options) {
        super(options)
        this.type = options.type
    }
}