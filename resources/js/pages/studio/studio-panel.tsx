
import StudioLayout from "@/layouts/studio-layout/studio-layout"
import { AspectRatio } from "@/components/ui/aspect-ratio"
import { ChartColumnDecreasing } from 'lucide-react';
import { MessageSquareText } from 'lucide-react';
import { ThumbsUp } from 'lucide-react';
import {
  Collapsible,
  CollapsibleContent,
  CollapsibleTrigger,
} from "@/components/ui/collapsible";
import { useState } from 'react';
import { ChevronUp } from 'lucide-react';

import { useMemo } from 'react';

import { getElapsedTime } from '@/lib/elapsedTime';

import { useTranslation } from 'react-i18next';

export const iframeHeight = "800px"

export const description = "A sidebar with a header and a search form."

interface Thumbnail {
  id: number;
  path: string;
}

interface LatestVideo {
  id: number;
  views_count: number;
  likes_count: number;
  comments_count: number;
  created_at: string;
  apv_per_video: number;
  thumbnail: Thumbnail | null;
}

interface StudioPanelProps {
  latestVideo: LatestVideo | null;
}

export default function StudioPanel({ latestVideo }: StudioPanelProps) {

  const { t } = useTranslation('studio');
  const [open, setOpen] = useState(true)

  const timeSincePublished = useMemo(() => {
    if (!latestVideo) return null;

    const { days, hours } = getElapsedTime(latestVideo.created_at);

    return t('panel.since_published', {
      days: t('panel.day', { count: days }),
      hours: t('panel.hour', { count: hours }),
    });
  }, [latestVideo, t]);

  return (
    <StudioLayout>
      <div className="flex gap-4 items-start">
        <div className="flex flex-col gap-4">
          <div className="rounded-lg border p-4">
            <p className="mb-2">{t('panel.latest_short_score')}</p>
            <AspectRatio ratio={16 / 9} className="bg-muted rounded-md">
              {latestVideo?.thumbnail && (
                <img
                  src={latestVideo.thumbnail.path}
                  alt=""
                  className="h-full w-full rounded-md object-cover"
                />
              )}
            </AspectRatio>
            <Collapsible open={open} onOpenChange={setOpen}>
              <div className="flex items-center justify-between">
                <div className="flex items-center gap-1.5 mt-2">
                  <ChartColumnDecreasing /><span>{latestVideo?.views_count ?? '—'}</span>
                  <MessageSquareText /><span>{latestVideo?.comments_count ?? '—'}</span>
                  <ThumbsUp /><span>{latestVideo?.likes_count ?? '—'}</span>
                </div>
                <CollapsibleTrigger><ChevronUp
                  className={`h-6 w-6 transition-transform duration-200 ${open ? '' : 'rotate-180'
                    }`}
                />
                </CollapsibleTrigger>
              </div>
              <CollapsibleContent>
                <p className="text-muted-foreground my-4">{timeSincePublished ?? 'There is no video'}</p>
                <div className="flex flex-col gap-2">
                  <p className="flex justify-between">
                    <span>{t('panel.views')}</span>
                    <span>{latestVideo?.views_count ?? '-'}</span>
                  </p>

                  <p className="flex justify-between">
                    <span>{t('panel.apv_per_video')}</span>
                    <span>{latestVideo?.apv_per_video ?? '-'}</span>
                  </p>

                  <p className="flex justify-between">
                    <span>{t('panel.likes')}</span>
                    <span>{latestVideo?.likes_count ?? '-'}</span>
                  </p>
                </div>
              </CollapsibleContent>
            </Collapsible>
          </div>
          <div className="rounded-lg border p-4">Item 2</div>
        </div>
        <div>
          <div className="rounded-lg border p-4">Item 3</div>
        </div>
      </div>
    </StudioLayout >
  );
}