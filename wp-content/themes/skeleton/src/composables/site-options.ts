import * as v from "valibot";
import { siteOptionsSchema, type SiteOptions } from "@/schemas/site-options";

declare global {
  const site_options: SiteOptions;
}

export function useSiteOptions() {
  return { ...v.parse(siteOptionsSchema, site_options) };
}
