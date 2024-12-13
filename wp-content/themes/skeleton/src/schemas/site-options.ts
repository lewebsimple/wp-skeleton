import * as v from "valibot";
import { contactSchema } from "@/schemas/contact";

export const siteOptionsSchema = v.object({
  name: v.string(),
  description: v.string(),
  contact: contactSchema,
});

export type SiteOptions = v.InferOutput<typeof siteOptionsSchema>;
