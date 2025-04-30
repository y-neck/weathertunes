import { createClient } from "@supabase/supabase-js";
import { useRuntimeConfig } from "#imports";

export function getSupabaseClient() {
  const config = useRuntimeConfig();
  return createClient(config.public.supabaseUrl, config.public.supabaseKey);
}
