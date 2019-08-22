import { Task } from './task'

export class ChoiceTask extends Task {
    options = []

    constructor (options) {
        super(options)
        this.type = options.type
        this.options = options.options
    }
}