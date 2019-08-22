export type TaskType = 'choice' | 'input'

let curID = 0

export abstract class Task {
    type : TaskType
    title : "Sem título"
    statement = "A questão não possui enunciado!"
    rightAnswer : any

    constructor(options: any) {
        if ('type' in options) this.type = options.type
        if ('title' in options) this.title = options.title
        if ('statement' in options) this.statement = options.statement
        if ('rightAnswer' in options) this.rightAnswer = options.rightAnswer
    }
}