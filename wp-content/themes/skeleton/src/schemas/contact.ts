import * as v from "valibot";

export const contactSchema = v.object({
  email: v.pipe(v.string(), v.email()),
});

export type Contact = v.InferOutput<typeof contactSchema>;
