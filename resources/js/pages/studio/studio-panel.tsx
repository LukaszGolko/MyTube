import { StudioAppSidebar } from "@/components/studio-components/studio-app-sidebar"
import { StudioSiteHeader } from "@/components/studio-components/studio-site-header"
import {
  SidebarInset,
  SidebarProvider,
} from "@/components/ui/sidebar"

export const iframeHeight = "800px"

export const description = "A sidebar with a header and a search form."

interface LatestVideo {
  id: number;
  views_count: number;
  likes_count: number;
  created_at: string;
}

interface StudioPanelProps {
  latestVideo: LatestVideo | null;
}

export default function StudioPanel({ latestVideo }: StudioPanelProps) {
    return(
      <div className="[--header-height:calc(--spacing(14))]">
      <SidebarProvider className="flex flex-col">
        <StudioSiteHeader />
        <div className="flex flex-1">
          <StudioAppSidebar collapsible="icon"/>
          <SidebarInset>
            <div className="flex flex-1 flex-col gap-4 p-4">
              <div className="grid auto-rows-min gap-4 md:grid-cols-3">
                <div className="aspect-video rounded-xl bg-muted/50" />
                <div className="aspect-video rounded-xl bg-muted/50" />
                <div className="aspect-video rounded-xl bg-muted/50" />
              </div>
              <div className="min-h-[100vh] flex-1 rounded-xl bg-muted/50 md:min-h-min" />
            </div>
          </SidebarInset>
        </div>
      </SidebarProvider>
    </div>
    );
}